window.onload = function(){
    function move_sprite(nsprite,nb){//sprite à utiliser
        // if(true){
        if (nsprite <= nb-1){
                nsprite += 1;
        }
        else{
            nsprite = 0;
        }
        // }
        // else{
            // nsprite = 0;
        // }
        // console.log(spritex);
        return nsprite;
    }
    //variable
    var trap = 0; //nombre de bird attrapé
    var speed = 1; //O ralenti 1 normal 2 accélérer
    var lvl = 0; //0menu 1 jeu 2 retry
    var size = 1;//0 petit 1 normal 2 grand 
    var lsprite = 141;//largeur du sprite
    var fond1 = 0;//pos d'origine du fond1
    var fond2 = 600;//pos d'origine du fond2
    var fond3 = 0;//pos d'origine du fond3
    var x = 16;//x du sprite
    var y = 305;//y du sprite

    var cmpt = 0;//compteur pour le saut
    var h = 305;//hauteur du saut
    var spritex = 0;//numéro du sprite
    // var sens = '';//sens du spite
    var keyboard = new Clavier();//clavier
    var fps = 20;//vitesse de raffraichissement

    //obstacle
    var spritesizex1 = 85;//taille x du bird à afficher
    var spritesizey1 = 59;//taille y du bird à afficher
    var ab1 = true;//affiché le bird
    var xb1 = 700;//position init du bird
    var ob1 = new Obstacle(32,42,50,50);//définie l'obstacle bird
    var b1x = 0;//Sprite du bird
    var yb1 = Math.floor(Math.random() * (325 - 150)) + 150;//position y du bird
    var bl = Math.floor(Math.random() * (7 - 0)) + 0;//bird affiché
    var bs = -5;
    var light = true; //jour

    //vitesse
    var spriteSpeed = 5;//vitesse du sprite
    var plan1Speed = -5;//vitesse du plan1
    var plan2Speed = -3;//vitesse du plan2
    var plan3Speed = -1;//vitesse du plan3

    //canva
    var canvas = document.getElementById("canvas");//canva
    // var cwidth = 400;//largeur du canva
    // var cheight = 600;//longeur du canva
    var ctx = canvas.getContext("2d");//2D

    //init audio
    var intro = new Audio();
    intro.src = "Sound/let's_go.mp3"
    var cat = new Audio();
    cat.src = "Sound/cat.mp3"
    var game_over = new Audio();
    game_over.src = "Sound/game_over.mp3"
   
   
    //init des images
    var retry = new Image();//def menu retry
    retry.src = "Images/retry.jpg"
    var menu = new Image();//def menu
    menu.src = "Images/Menu.jpg"
    var plan1 = new Image();//def plan1
    plan1.src = "Images/plan1.png";
    var plan2 = new Image();//def plan2
    plan2.src = "Images/plan2.png";
    var plan3 = new Image();//def plan3
    plan3.src = "Images/plan3.png";
    var sprite = new Image();//def sprite
    sprite.src = "Images/spritesheet2.png";
    var bird1 = new Image();//def sprite
    bird1.src = "Images/bird.png";
    var bird2 = new Image();//def sprite
    bird2.src = "Images/bird2.png";
    var bird3 = new Image();//def sprite
    bird3.src = "Images/bird3.png";
    var bird4 = new Image();//def sprite
    bird4.src = "Images/bird4.png";
    var bird5 = new Image();//def sprite
    bird5.src = "Images/bird5.png";
    var bird6 = new Image();//def sprite
    bird6.src = "Images/bird6.png";
    var bird7 = new Image();
    bird7.src = "Images/bird7.png"
    var bird =[bird1,bird2,bird3,bird4,bird5,bird6,bird7];
    
    setInterval(function(){
        if (lvl==0){//menu
            ctx.drawImage(menu,0,0,600,400);
            if(keyboard.espace || keyboard.gauche){
                setTimeout(()=>{
                    lvl = 1;
                    intro.play();
                },100);
            }
        }

        else if(lvl==2){//retry
            ctx.drawImage(retry,0,0,600,400);
            if(keyboard.espace || keyboard.gauche){
                setTimeout(()=>{
                    lvl = 1;
                },100);
            }
            speed = 1; //vitesse normal
            plan1Speed = -5;//vitesse plan 1
            spriteSpeed = 5;//vitesse sprite
            plan2Speed = -3;//vitesse plan 2
            plan3Speed = -1;//vitesse plan 3
            size = 1;//taille normal
            spritesizex1 = 85;//taille x du bird à afficher
            spritesizey1 = 59;//taille y du bird à afficher
            h = 305;//hauteur du saut
            x = 16;//x du sprite
            y = 305;//y du sprite
            cmpt = 0;//compteur du saut
            bs = plan1Speed;
            trap = 0;
        }

        else if (lvl==1){//lvl==1
            // ctx.clearRect(0, 0, cwidth, cheight);
            
            // console.log(fond1+" "+fond2+" "+fond3);
            // ctx.save();
            
            //defilement fond
            fond1 += plan1Speed;
            if (fond1 < -2500) {
                fond1 = 0;
            }
            fond2 += plan2Speed;
            if (fond2 < -2500) {
                fond2 = 0;
            }

            fond3 += plan3Speed;
            if (fond3 < -2500){
                fond3 = 0;
            }

            // afficher la même images deux foix pour que le déplacement soit infinie
            ctx.drawImage(plan3, fond3, 0, 2500, 400);
            ctx.drawImage(plan3, fond3 + 2500, 0, 2500, 400);
            
            ctx.drawImage(plan2, fond2, 0, 2500, 400);
            ctx.drawImage(plan2, fond2 + 2500, 0, 2500, 400);
            
            ctx.drawImage(plan1, fond1, 0, 2500, 400);
            ctx.drawImage(plan1,fond1+2500,0,2500,400);

            //saut
            if(keyboard.haut && cmpt == 0 || keyboard.espace && cmpt == 0){//saut du sprite
                cmpt = 40;//début du compteur
            }

            if (cmpt > 0){//si le compteur à débuter
                y = h - 200 + (20 - cmpt) * (20 - cmpt) / 3;//position en y
                cmpt--;//on retir 1 au compteur
            }
            else{//sinon auteur de base
                y = h;
            }

            //sprite
            if (x<200){//le faire avancer tant qu'il est pas au centre
                x += spriteSpeed;//déplacement du sprite
            }

            //obstacle (bird)
            b1x = move_sprite(b1x,4);//sprite du bird
            if(ab1==true){//si on doit afficher le bird
                ctx.drawImage(bird[bl],b1x*425,0,425,325,xb1,yb1,42,32);//325- 150affiché le bird
            }
            ob1 = new Obstacle(xb1,yb1,42,32);//position de l'obstacle
            xb1+=bs;//mouvement du bird
            // console.log(xb1+=parseInt(bs));
            if (xb1<-32){//bird fin du canva
                xb1 = 600;//reinit la position x
                ab1=true;//afficher le bird
                bl = Math.floor(Math.random() * (7 - 0)) + 0;//changer le bird
                yb1 = Math.floor(Math.random() * (325 - 200)) + 200;//changer la position y
                // console.log(bl);
            }

            //collision
            // || (cmpt>0 &&ob1.collision(x,y+(h-y),spritesizex1-1,spritesizey1)&&ab1==true)
            if(ob1.collision(x,y,spritesizex1,spritesizey1)&&ab1==true){//si collision
                ab1=false;//ne plus affiché
                // console.log(bl);
                switch(bl){//effect et point
                    case 1://frein ou normal
                        if (speed ==1){//si vitesse normal
                            speed = 0;//ralenti
                            plan1Speed = -3; //vitesse plan 1
                            spriteSpeed = 3;//vitesse sprite
                            plan2Speed = -2;  //vitesse plan 2
                            plan3Speed = -1;//vitesse plan 3
                        }
                        else if(speed ==2){
                            speed = 1; //vitesse normal
                            plan1Speed = -5;//vitesse plan 1
                            spriteSpeed = 5;//vitesse sprite
                            plan2Speed = -3;//vitesse plan 2
                            plan3Speed = -1;//vitesse plan 3
                        }
                        break;
                    case 2://mort
                        lvl = 2;//afficher le retry
                        break;
                    case 3://petit ou taille normal
                    if (size ==1){//si taille normal
                        size = 0;//taille petit
                        spritesizex1 = 42;//taille x du bird à afficher
                        spritesizey1 = 29;//taille y du bird à afficher
                        h = 335;//hauteur du saut
                    }
                    else if(size ==2){//si taille grande
                        size = 1;//taille normal
                        spritesizex1 = 85;//taille x du bird à afficher
                        spritesizey1 = 59;//taille y du bird à afficher
                        h = 305;
                    }
                        break;
                    case 4://grand ou normal
                        if (size ==0){//si taille normal
                            size = 1;//taille normal
                            spritesizex1 = 85;//taille x du bird à afficher
                            spritesizey1 =  59;//taille y du bird à afficher
                            h = 305;//hauteur du saut
                        }
                        else if(size ==1){//si taille grande
                            size = 2;//taille grande
                            spritesizex1 = 127;//taille x du bird à afficher
                            spritesizey1 = 88;//taille y du bird à afficher
                            h = 276;
                        }
                        break;
                    case 5://accélérer ou normal
                        if (speed ==1){//si vitesse normal
                            speed = 2;//accélérer
                            plan1Speed = -7;//vitesse plan 1
                            spriteSpeed = 7;//vitesse sprite
                            plan2Speed = -5;//vitesse plan 2
                            plan3Speed = -3;//vitesse plan 3
                        }
                        else if(speed ==0){//si vitesse est ralenti
                            speed = 1; //vitesse normal
                            plan1Speed = -5;//vitesse plan 1
                            spriteSpeed = 5;//vitesse sprite
                            plan2Speed = -3;//vitesse plan 2
                            plan3Speed = -1;//vitesse plan 3
                        }
                        break;
                    case 6:
                        if(light){
                            plan3.src ="Images/plan3-1.png";
                            light = false;
                        }
                        else{
                            plan3.src = "Images/plan3.png"
                            light = true;
                        }
                        // console.log(plan3.src);
                        break
                }
                if(bl !=2){
                    cat.play();
                }
                else{
                    game_over.play();
                }
                trap +=1
                bs=bs*1.01;
                // console.log(speed)
            }

            spritex = move_sprite(spritex,2);//quelle sprite
            ctx.drawImage(sprite,spritex*lsprite , 0, 141, 118, x, y, spritesizex1, spritesizey1);//afficher sprite
            // ctx.restore();
            ctx.drawImage(bird1,b1x*425,0,425,325,5,5,63,48);//325- 150 affiché le bird
            ctx.font="48px PIXEL";
            ctx.fillText("X"+trap, 73, 48);
            
        }
    }, fps);

    //event click
    canvas.addEventListener("click",function(){//si on click sur le canva
        if(lvl == 0 || lvl == 2){//si on est au menu ou retry
            lvl = 1;//alors on joue
            intro.play();
        }
        else if(lvl ==1 && cmpt==0){//si on joue
            cmpt = 40;//alors on saute
        }
    });
};