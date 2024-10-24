window.onload = function(){
    //define function
    function move_sprite(){// fonction pour les mouvement de pas du personnage
        // if(keyboard.droite || keyboard.gauche ){//si il bouge à droite ou à gauche
        if(true){
            if (spritex<=6){//si se n'est pas le dernier sprite alors passer au sprite suivant

                spritex+=1;
            }
            else{// sinn revenir au premier sprite
                spritex = 0;
            }
        }
        else{//sinn mettre le premier sprite
            spritex = 0;
        }
        return spritex;
    }

    //define var
    var lsprite = 32; //largeur x du sprite
    var spritex = 0;//quelle sprite
    var  keyboard = new Clavier();
    var fps = 10;// raffraichissement en ms
    fps = 30;
    var x = 0;//position x
    x = 16;
    var speed = 5;
    var y = 300;//position y
    var cmpt= 0 //compteur de saut
    sens ='';
    var cmpt2 = 0;
    fond = 0;
    var canvas = document.getElementById("canvas");//définir le canva
    var ctx = canvas.getContext("2d");//dessin 2d ou 3d
    
    //create decor and sprite
    //create decor and sprite
    var plan1 = new Image();//définie le décor
    plan1.src = "Images/plan1.png"
    plan1.onload = function(){
        ctx.drawImage(this,0,0,1200,400);
    }
    var plan2 = new Image();
    plan2.src = "Images/plan2.png"
    plan2.onload = function(){
        ctx.drawImage(this,0,0,1200,400);
    }
    var plan3 = new Image();
    plan3.src = "Images/plan3.png"
    plan3.onload = function(){
        ctx.drawImage(this,0,0,1200,400);
    }
    var sprite = new Image();// définie les sprites
    sprite.src = "Images/mario-spritesheet.png"
    sprite.onload = function(){
        ctx.drawImage(this,0,260,32,64);
    }

//déplacement par clavier
    setInterval(function(){//mouvement
        ctx.save();// sauvegarder l'état du dessin
        ctx.drawImage(plan3,fond,0,2500,400);
        ctx.drawImage(plan2,fond,0,2500,400);
        ctx.drawImage(plan1,fond,0,2500,400);
        // ctx.fillRect(fond+200,300,32,64);
        sens = "";
        x+=speed;
        // if(keyboard.droite){
        //     sens ='';
        //     if(x<584){
        //         x+=5;
        //     }

        // }
        //     else if(keyboard.gauche){
        //     sens = '-';
        //     if(x>16){
        //         x+= -5;
        //     }

        // }
        if(keyboard.haut && cmpt==0){
            cmpt = 40
        }

        //changement de sens du sprite
        ctx.translate(x,y); //position 
        if(sens == ''){
            ctx.scale(1,1);
        }
        else if(sens =='-'){
            ctx.scale(-1,1);
        }
        
        //saut
        if (cmpt>0){
            // y = 285-50+(20-cmpt)*(20-cmpt)/8;
            y = 300-100+(20-cmpt)*(20-cmpt)/4;
            cmpt--;
        }
        else{
            y = 300
        }

        // // fond zelda
        // console.log(fond + " " + cmpt2);
        // if (fond == 0 && x>582){
        //     x = 17;
        //     cmpt2 = 24;
        // }
        // else if(fond == -600 && (x<=16) ){
        //     cmpt2 = -24;
        //     x = 578;
        // }

        // if (cmpt2<0){
        //     fond += 25;
        //     cmpt2 ++;
        // }
        // else if (cmpt2>0){
        //     fond -= 25;
        //     cmpt2 --;
        // }

        ctx.drawImage(sprite,move_sprite()*lsprite,128,32,64,-16,0,32,64);//sprite qui bouge avec scale
        ctx.restore();// restaurer la dernière sauvegarde (ctx.save();)
    },fps)

};
