const CANVAS_WIDTH = 650;
const CANVAS_HEIGHT = 650;
const TILE_SIZE = 50;

const NUM_PLAYERS = setup_config['num_players'];
const TILE_COORDS = setup_config['tile_coords'];
const TILE_TYPES = setup_config['tile_types'];
const TILE_CONFIG = setup_config['tile_config'];

const COLOR_MAP = {
    'ore' : '#A59BA4',
    'brick' : '#A24120',
    'wood' : '#006400',
    'wheat' : '#E2AB49',
    'sheep' : '#90EE90',
    'desert' : '#A87D20',
    'sea' : '#394EA9',
    '341' : '#394EA9',
    '241ore' : '#394EA9',
    '241brick' : '#394EA9',
    '241wood' : '#394EA9',
    '241wheat' : '#394EA9',
    '241sheep' : '#394EA9'
};