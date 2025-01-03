<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Decree\StoreRequest;
use App\Http\Requests\Decree\UpdateRequest;
use App\Models\Decree;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DecreeService extends BaseFilterService
{

    public string $model = Decree::class;
    
    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->filterAllItem($request);
    }

    public function create(StoreRequest $request): ?Decree
    {
        $name = $request->input('name');
        $doc = $request->file('doc');
        $filename = $this->createDocFilename($name, $doc);
        $docPath = $this->storeDoc($doc, $filename);

        if (!$docPath) return null;

        return Decree::create([
            'name' => $name,
            'doc_path' => $docPath,
            ...$this->getFileMetaData($doc)
        ]);
    }

    public function update(UpdateRequest $request, Decree $decree): bool
    {
        $data = $request->only('name');

        if ($file = $request->file('doc')) {

            $filename = $this->createDocFilename(
                $request->input('name'),
                $file
            );

            $path = $this->storeDoc($file, $filename);

            if ($path) {
                DecreeService::deleteDoc($decree);
                $data = array_merge(
                    $data,
                    [
                        'doc_path' => $path,
                        $this->getFileMetaData($file)
                    ]
                );
            }
        }

        return $decree->update($data);
    }

    public function delete(string $id): bool
    {
        $decree = $this->find($id);
        if (!$decree) return false;

        return (bool)$decree->delete();
    }

    public function getFileMetaData(UploadedFile $file): array
    {
        return [
            'type' => $file->extension(),
            'size' => number_format($file->getSize() / (1024 * 1024), 2)
        ];
    }

    public function createDocFilename(string $name, UploadedFile $file): string
    {
        $filename = str($name)->slug() . '_' . now()->timestamp;
        $extension = $file->extension();

        return "$filename.$extension";
    }

    public function storeDoc(UploadedFile $file, string $filename): string|null
    {
        $path = $file->storeAs(
            'decrees',
            $filename,
            ['disk' => 'public']
        );
        if (!$path) return null;

        return "storage/$path";
    }

    public function find(string $id): ?Decree
    {
        return Decree::find($id);
    }

    public static function deleteDoc(Decree $decree): void
    {
        Storage::disk('public')->delete(
            str($decree->doc_path)->replace(
                'storage/',
                ''
            )
        );
    }
}
