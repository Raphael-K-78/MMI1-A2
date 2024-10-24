// JavaScript Document

function Clavier () {
	
	// console.log('----- class.clavier.js');
	
	var HAUT					= 38;
	var DROITE					= 39;
	var BAS						= 40;
	var GAUCHE					= 37;
	var ESPACE                  = 32;
	
	var _touche					= this;
	_touche.press				= false;
	_touche.haut				= false;
	_touche.droite				= false;
	_touche.bas					= false;
	_touche.gauche				= false;
	_touche.espace				= false;
	
	var _evt					= null;
	var _statut					= false;
	
	document.onkeydown = function (evt) {
		_evt = evt || window.event;
		// console.log('document.onkeydown ' + _evt.keyCode);
		touche(_evt.keyCode, _evt.type);
	};
	
	document.onkeyup = function (evt) {
		_evt = evt || window.event;
		touche(_evt.keyCode, _evt.type);
	};
	
	// METHODES
	
	function touche(code, statut) {
		
		_statut = false;
		if (statut == 'keydown') {
			_statut				= true;
		};
		
		switch (code) {
			case HAUT :
				_touche.press	= _statut;
				_touche.haut	= _statut;
				break;
			case DROITE :
				_touche.press	= _statut;
				_touche.droite	= _statut;
				break;
			case BAS :
				_touche.press	= _statut;
				_touche.bas		= _statut;
				break;
			case GAUCHE :
				_touche.press	= _statut;
				_touche.gauche	= _statut;
				break;
			case ESPACE :
				_touche.press	= _statut;
				_touche.espace	= _statut;
				break;
			default :
				break;
		};
	};
	
};