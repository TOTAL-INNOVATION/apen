<?php

return [

	'unauthorized' => 'Vous n\'êtes pas autorisé à effectuer cette action.',

	'verification' => [
		'resend' => 'Un nouveau mail de vérification vous a été envoyé.',
		'verified' => 'Votre compte a été activé, veuillez vous connecter.',
	],

	'contact' => [
		'failed' => 'Votre message n\'a pas pu être envoyé. Veuillez reessayer.',
		'succeeded' => 'Votre message a été pris en compte. Nous vous repondrons bientôt avec un mail en réponse.',
	],

	'users' => [
		'create' => [
			'failed' => 'La création du compte a échoué. Veuillez reessayer.',
			'succeeded' => 'L\'utilisateur a été ajouté avec succès.',
		],
		'update' => [
			'failed' => 'L\'utilisateur que vous voulez editer n\'existe pas.',
			'succeeded' => 'L\'utilisateur a été édité avec succès.',
		],
		'delete' => [
			'failed' => 'L\'utilisateur que vous voulez rétirer n\'existe pas.',
			'succeeded' => 'L\'utilisateur a été rétiré avec succès.',
		]
	],

	'article' => [
		'image' => [
			'storingFailed' => 'Il y\'a eu une erreur lors de l\'enrégistrement de l\'image.',
			'stored' => 'L\'image a été sauvegardée avec succès.',
			'deleteFailed' => 'Il y\'a eu une erreur lors de la suppression.',
			'deleted' => 'L\'image a été supprimée avec succès.',
		],
		'create' => [
			'failed' => 'Une erreur est survenu lors de l\'ajout de l\'article.',
			'succeeded' => 'L\'article a été ajouté avec succès.',
		],
		'edit' => [
			'notFound' => 'L\'article que vous tentez de modifier n\'existe pas.',
		],
		'update' => [
			'failed' => 'Une erreur est survenu lors de l\'enrégistrement des modifications. Veuillez réessayer.',
			'succeeded' => 'L\'article a été modifié avec succès.',
		],

		'delete' => [
			'failed' => 'Une erreur est survenu lors de la suppression de l\'article.',
			'succeeded' => 'L\'article a été supprimé avec succès.',
		]
	],

	'decree' => [
		'create' => [
			'failed' => 'Une erreur est survenu lors de l\'ajout du décret.',
			'succeeded' => 'Le décret a été ajouté avec succès.',
		],
		'edit' => [
			'notFound' => 'Le décret que vous tentez de modifier n\'existe pas.',
		],
		'update' => [
			'failed' => 'Une erreur est survenu lors de l\'enrégistrement des modifications. Veuillez réessayer.',
			'succeeded' => 'Le décret a été modifié avec succès.',
		],

		'delete' => [
			'failed' => 'Une erreur est survenu lors de la suppression du décret.',
			'succeeded' => 'Le décret a été supprimé avec succès.',
		]
	],

	'messages' => [
		'markedAsRead' => [
			'failed' => 'Le message que vous tentez de marquer comme lu est indisponible.',
			'succeeded' => 'Le message a été marqué comme lu.',
		],

		'delete' => [
			'failed' => 'Le message que vous tentez de supprimer n\'existe plus.',
			'succeeded' => 'Le message a été supprimé avec succès.',
		],
	],

	'flash_info' => [
		'created' => 'Le flash info a été ajouté avec succès.',
		'update' => [
			'failed' => 'L\'info n\'est plus disponible.',
			'succeeded' => 'L\'info a été mise à jour avec succès.'
		],
		'delete' => [
			'failed' => 'L\'info n\'est plus disponible.',
			'succeeded' => 'L\'info a été supprimée avec succès.',
		],
	],
];
