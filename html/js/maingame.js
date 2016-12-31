

var center_x = CANVAS_WIDTH / 2;
var center_y = CANVAS_HEIGHT / 2;

var game_board;

var game_area = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = CANVAS_WIDTH;
        this.canvas.height = CANVAS_HEIGHT;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function updateGameArea(){
  
}

function startGame(){
    game_area.start();
    game_board = new gameBoard(game_area.context, NUM_PLAYERS, TILE_SIZE, center_x, center_y);
}