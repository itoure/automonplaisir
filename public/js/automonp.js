(function($) {
	
	// options default date
	$.datepicker.regional['fr'] = {clearText: 'Effacer', clearStatus: '',
			closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
			prevText: '<Préc', prevStatus: 'Voir le mois précédent',
			nextText: 'Suiv>', nextStatus: 'Voir le mois suivant',
			currentText: 'Courant', currentStatus: 'Voir le mois courant',
			monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
			'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
			monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
			'Jul','Aoû','Sep','Oct','Nov','Déc'],
			monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
			weekHeader: 'Sm', weekStatus: '',
			dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
			dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
			dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
			dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
			dateFormat: 'dd/mm/yy', firstDay: 0, 
			initStatus: 'Choisir la date', isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['fr']);
	
	jQuery.extend(jQuery.validator.messages, {
		  required: "Champ obligatoire",
		  remote: "votre message",
		  email: "E-mail invalide",
		  url: "Url invalide",
		  date: "Date invalide",
		  dateISO: "Date invalide",
		  number: "Champ numérique",
		  digits: "Champ numérique",
		  creditcard: "CB invalide",
		  equalTo: "votre message",
		  accept: "votre message",
		  maxlength: jQuery.validator.format("votre message {0} caractéres."),
		  minlength: jQuery.validator.format("votre message {0} caractéres."),
		  rangelength: jQuery.validator.format("votre message  entre {0} et {1} caractéres."),
		  range: jQuery.validator.format("votre message  entre {0} et {1}."),
		  max: jQuery.validator.format("votre message  inférieur ou égal à {0}."),
		  min: jQuery.validator.format("votre message  supérieur ou égal à {0}.")
		});
	
})(jQuery);