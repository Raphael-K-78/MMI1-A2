// Classe Obstacle, pour la gestion des collisions (rectangle / rectangle => collision()
// point / rectangle => getDistanceX() et getDistanceY() ....
// Auteur : Olivier Le Cadet

function Obstacle (p_x,p_y,p_largeur,p_hauteur) {
	
	// variables de classe. Position et dimensions de l'obstacle.
	this.x = p_x;
	this.y = p_y;
	this.hauteur = p_hauteur;
	this.largeur = p_largeur;
	
	// Pour savoir si le point de coordonn�es 
	// (a,b) est compris dans la zone interdite par
	// la pr�sence de l'obstacle
	Obstacle.prototype.notAllowed = function(a,b){
		if (a>=this.x&&a<=this.x+this.largeur&&b>=this.y&&b<=this.y+this.hauteur)
			return true;
		else	
			return false;
	};
	
	// Distance euclidienne 
	// entre l'obstacle et un point de coordonn�es (a,b)
	Obstacle.prototype.getDistanceEuclidienne = function(a,b){
		if (a<this.x&&b<this.y)
			return Math.sqrt((this.x-a)^2+(this.y-b)^2);
		else if (a>=this.x&&a<=this.x+this.largeur&&b<this.y)
			return this.y-b;
		else if (a>this.x+this.largeur&&b<this.y)
			return Math.sqrt((this.x+this.largeur-a)^2+(this.y-b)^2);
		else if (a>=this.x+this.largeur&&b>=this.y&&b<=this.y+this.hauteur)
			return a-this.x-this.largeur;
		else if (a>this.x+this.largeur&&b>this.y+this.hauteur)
			return Math.sqrt((this.x+this.largeur-a)^2+(this.y+this.hauteur-b)^2);
		else if (a>=this.x&&a<=this.x+this.largeur&&b>this.y+this.hauteur)
			return b-this.y-this.hauteur;
		else if (a<this.x&&b>this.y+this.hauteur)
			return Math.sqrt((this.x-a)^2+(this.y+this.hauteur-b)^2);
		else
			return this.x-a;
	};
	
	// Retourne la distance � l'obstacle d'un point de 
	// coordonn�es (a,b) suivant l'axe des abscisses (prolection
	//horizontale)
	// ou l'oppos� de la distance si on se trouve � droite de 
	// l'obstacle
	Obstacle.prototype.getDistanceX = function(a,b){
		if (a<this.x)
			return this.x-a;
		else if (a>this.x+this.largeur)
			return this.x+this.largeur-a;
		else
			return 0;
	};
	
	// Retourne la distance � l'obstacle d'un point de 
	// coordonn�es (a,b) suivant l'axe des ordonn�es (projection
	//verticale)
	// ou l'oppos� de la distance si on se trouve en bas de 
	// l'obstacle
	Obstacle.prototype.getDistanceY = function(a,b){
		if (b<this.y)
			return this.y-b;
		else if (b>this.y+this.hauteur)
			return this.y+this.hauteur-b;
		else
			return 0;
	};
	
	Obstacle.prototype.toString = function(){
		console.log("position :"+this.x+","+this.y+". Dimensions : "+this.largeur+","+this.hauteur);
	};
	// Collision: collision entre deux rectangles (AABB-AABB)
	// Fonction qui retourne true s'il y a collision entre l'obstacle
	// et un autre rectangle de coin sup�rieur gauche de coordonn�es
	// (x,y) et de largeur l et hauteur h
	Obstacle.prototype.collision = function(x2,y2,l,h){
		if (this.x-x2>l||this.y-y2>h||x2-this.x>this.largeur||y2-this.y>this.hauteur)
			return false;
		else
			return true;
	};
}