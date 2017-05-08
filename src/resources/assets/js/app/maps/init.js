require('./maps.addClub');
require('./maps.chooseClub');
require('./maps.allUserClubs');
require('./maps.allClubs');
require('./maps.allUserLocations');
require('./maps.allUserPlaces');
require('./maps.changeLocation');

url = {}
flag = 'http://maps.google.com/mapfiles/kml/pal2/icon13.png';
url.clubs = '/api/clubs';
url.userClubs = '/api/user/clubs';
url.userLocation = '/api/user/locations';
url.userPlace = '/api/user/places';

