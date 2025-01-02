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
        $filename = $this->generateDocFilename($name);
        $doc_path = $this->storeDoc(
            $request->file('doc'),
            $filename,
        );

        if (!$doc_path) return null;

        return Decree::create(
            compact('name', 'doc_path')
        );
    }

    public function update(UpdateRequest $request, Decree $decree): bool
    {
        $data = $request->only('name');

        if ($file = $request->file('doc')) {

            $filename = $this->generateDocFilename(
                $request->input('name'),
            );

            $path = $this->storeDoc($file, $filename);

            if ($path) {
                DecreeService::deleteDoc($decree);
                $data['doc_path'] = $path;
            }
        }

        return $decree->update($data);
    }

    public function delete(string $id): bool
    {
        $decree = $this->find($id);
        if ($decree) return false;

        return (bool)$decree->delete();
    }

    public function generateDocFilename(string $name): string
    {
        return str($name)->slug() . '_' . now()->toTimeString();
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
