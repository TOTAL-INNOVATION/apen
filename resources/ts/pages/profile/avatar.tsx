import { router } from "@inertiajs/react";
import { Camera } from "lucide-react";
import React, { useEffect, useState } from "react";
import { useDropzone } from "react-dropzone";
import { DEFAULT_AUTHORIZED_TYPES } from "~/components/ui/image-input";
import { asset, cn } from "~/lib/utils";

function Avatar({url}: {url: string}) {
	
	const [preview, setPreview] = useState<null|string>(null);
	const { getRootProps, getInputProps, isDragAccept, isDragReject } = useDropzone({
		accept: DEFAULT_AUTHORIZED_TYPES,
		onDrop: (acceptedFiles) => {
			if (acceptedFiles.length)
				setPreview(URL.createObjectURL(acceptedFiles[0]));
		}
	});

	useEffect(() => {
        return () => {
            if (preview) URL.revokeObjectURL(preview);
        };
    }, [preview]);

	return (
		<div { ...getRootProps({className: cn("relative w-36 h-36 border-[4px] border-rainee rounded-full", {
			"ring-error": isDragReject,
			"ring-success": isDragAccept,
		},)}) }>
			<img src={preview ?? asset(url)} alt="photo de profil" className="w-full h-full rounded-full" />
			<input {...getInputProps({ name: "avatar", onChange: onInputChange })} />

			<span className="p-1 absolute bottom-0 right-0 bg-white border-2 border-rainee rounded-full">
				<Camera className="w-6 h-6 stroke-dark/50" />
			</span>
		</div>
	);

	function onInputChange(event: React.ChangeEvent<HTMLInputElement>) {
		const files = event.target.files;

		if (files && files.length) {
			const formData = new FormData();
			formData.append("avatar", files[0]);

			router.post("/profil/modifier-la-photo", formData);
		}
		
	}
}

export default Avatar;
