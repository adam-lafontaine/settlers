function gameBoard(context, num_players, tile_size, center_x, center_y){
    var num_rows = num_players > 4 ? 5 : 4;
    var num_sides = 6;
    var tile_height = tile_size * Math.sqrt(3);    
    
    this.tiles = [];
    
    var tile_config = TILE_CONFIG;
    for(var i = 0; i < tile_config.length; i++)
    {        
        var type = tile_config[i]['type'];
        var coords = scaleCoords(tile_config[i]['coords'], tile_size, center_x, center_y);
        var num_alpha =  tile_config[i]['num_alpha'];
        this.tiles.push(new hexTile(tile_size, type, coords['xpos'],  coords['ypos'], num_alpha));
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
    
    if(tile.num_alpha !== null){
        var radius = NUM_ALPHA_RADIUS;
        drawNumAlpha(context, tile.center_xy, NUM_ALPHA_RADIUS, tile.num_alpha);
    }    
}

//------------------------------------

function drawNumAlpha(context, center_xy, radius, num_alpha){
    drawCircle(context, '#FFFFFF', center_xy, radius);
    
    context.textAlign = 'center';
    context.fillStyle = '#FF0000';
    var ypos = center_xy['ypos'] - 0.45 * radius;
    var font_size = 0.5 * radius;
    
    context.font = font_size.toString()+ 'px Arial';
    context.fillText(num_alpha['alpha'], center_xy['xpos'], ypos);
    
    context.fillStyle = '#000000';
    ypos = center_xy['ypos'] + 0.5 * radius;
    font_size = 0.8 * radius;
    context.font = 'bold ' + font_size.toString()+ 'px Arial';   
    context.fillText(num_alpha['num'], center_xy['xpos'], ypos);
}

