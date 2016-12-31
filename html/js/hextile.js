function hexTile(size, type, center_x, center_y){
  var num_sides = 6;
  this.type = type
  this.color = COLOR_MAP[type];
  this.center_xy = {'xpos' : center_x, 'ypos' : center_y};
  this.vertices = calcPolygonCoords(num_sides, size, center_x, center_y);      
}

//------------------------------------------

function calcPolygonCoords(num_sides, size, center_x, center_y){
  
  var coords = [];
  
  for (var i = 0; i < num_sides; i ++) {
    var x = center_x + size * Math.cos(i * 2 * Math.PI / num_sides);
    var y = center_y + size * Math.sin(i * 2 * Math.PI / num_sides);
    coords.push({'xpos' : x, 'ypos' : y});
  }
  
  return coords;
}

//---------------------------------------------

function drawPolygon(context, color, coords){  
  
  context.fillStyle = color;
  context.beginPath();
  
  for(var i = 0; i < coords.length; i++){
    context.lineTo (coords[i]['xpos'], coords[i]['ypos']);
  }
  context.lineTo (coords[0]['xpos'], coords[0]['ypos']);
  
  context.strokeStyle = "#000000";
  context.lineWidth = 1;
  context.stroke();
  context.fill(); 
}
