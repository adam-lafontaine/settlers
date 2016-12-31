function gameBoard(context, num_players, tile_size, center_x, center_y){
    var num_rows = num_players > 4 ? 5 : 4;
    var num_sides = 6;
    var tile_height = tile_size * Math.sqrt(3);    
    
    this.tiles = [];
    
    var tile_config = TILE_CONFIG;
    for(var i = 0; i < tile_config.length; i++)
    {
        var coords = scaleCoords(tile_config[i]['coords'], tile_size, center_x, center_y);
        this.tiles.push(new hexTile(tile_size, tile_config[i]['type'], coords['xpos'],  coords['ypos']));
    }
    
    drawBoard(context, this.tiles);
}

//---------------------------------------------

//scale coordinates to client's screen
function scaleCoords(base_coords, tile_size, center_x, center_y){
    
    var xpos = center_x + tile_size * base_coords['xpos'];
    var ypos = center_x + tile_size * base_coords['ypos'];
    
    return {'xpos' : xpos, 'ypos' : ypos};
}

//-----------------------------------------

function drawBoard(context, tiles){
    for(var i = 0; i < tiles.length; i++){
        drawTile(context, tiles[i]);
    }
}

//----------------------------------------------

function drawTile(context, tile){
    drawPolygon(context, tile.color, tile.vertices);  
}

