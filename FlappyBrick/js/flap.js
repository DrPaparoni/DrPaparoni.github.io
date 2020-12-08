/*
   
Original Author: Eric Walter
Date Created: 10/3/2019
Version: 1
Date Last Modified: 10/3/2019
Modified by: Eric Walter
Modification log: Created based off of w3 schools example
adjusted gravity, changed colors and font stylings
adjusted obstacle size
adjusted obstacle speed

*/

/*----------Declaring variables-----------*/

var myGamePiece;
var myObstacles = [];
var myScore;

/*-----Creates Gamepiece and score counter-----*/

function startGame() {
    myGamePiece = new component(25, 25, "purple", 15, 120);
    myGamePiece.gravity = 0.07;
    myScore = new component("30px", "Consolas", "white", 28, 40, "text");
    myGameArea.start();
}

/*------Creates and clears canvas in HTML-----*/

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 500;
        this.canvas.height = 300;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

/*-----Determines how components function------*/

function component(width, height, color, x, y, type) {
    this.type = type;
    this.score = 0;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;
    this.gravity = 2;
    this.gravitySpeed = 2;
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.gravitySpeed += this.gravity;
        this.x += this.speedX;
        this.y += this.speedY + this.gravitySpeed;
        this.hitBottom();
    }
    //Stops the gamepiece at the bottom
    this.hitBottom = function() {
        var rockbottom = myGameArea.canvas.height - this.height;
        if (this.y > rockbottom) {
            this.y = rockbottom;
            this.gravitySpeed = 0;
        }
    }
/*-----Determines what will cause a game over-----*/    
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}


function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            return;
        } 
    }

/*-----Procedurally genearates obstacles-----*/
    myGameArea.clear();
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(150)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 60;
        maxGap = 200;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(17, height, "green", x, 0));
        myObstacles.push(new component(17, x - height - gap, "green", x, height + gap));
    }
    //Moves the obstacles towards the player
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].x += -1.5;
        myObstacles[i].update();
    }
    //updates score based on time alive
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    myGamePiece.newPos();
    myGamePiece.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

//function to move the gamepiece
function accelerate(n) {
    myGamePiece.gravity = n;
}
