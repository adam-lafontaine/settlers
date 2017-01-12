const CANVAS_WIDTH = 650;
const CANVAS_HEIGHT = 650;
const TILE_SIZE_FACTOR = 1 / 13;
const NUM_TILE_RADIUS_FACTOR = TILE_SIZE_FACTOR * 0.4;

const NUM_PLAYERS = setup_config['num_players'];
const TILE_CONFIG = setup_config['tile_config'];

const COLOR_MAP = {
    'ore' : '#A59BA4',
    'brick' : '#A24120',
    'wood' : '#006400',
    'wheat' : '#EFB01C',
    'sheep' : '#90BC25',
    'desert' : '#A87D20',
    'sea' : '#394EA9',
    '341' : '#394EA9',
    '241ore' : '#394EA9',
    '241brick' : '#394EA9',
    '241wood' : '#394EA9',
    '241wheat' : '#394EA9',
    '241sheep' : '#394EA9'
};