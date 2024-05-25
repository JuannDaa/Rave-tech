// Inicializa el mapa
const map = L.map('map--container').setView([4.5709, -74.2973], 13); // Ajusta lat, lng y zoom según tu ubicación inicial preferida.

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Obtiene las sedes de la base de datos
getSedesFromDatabase().then(sedes => {
    sedes.forEach(sede => {
        // Crear el enlace a Google Maps
        var googleMapsLink = `https://www.google.com/maps/dir/?api=1&destination=${sede.latitud},${sede.longitud}`;

        // Crear el marcador y añadirlo al mapa
        var marker = L.marker([sede.latitud, sede.longitud]).addTo(map);

        // Añadir un popup al marcador con el enlace a Google Maps
        marker.bindPopup(`<a href="${googleMapsLink}" target="_blank">${sede.nombre} - Abrir en Google Maps</a>`);
    });
}).catch(error => {
    console.error('Error al obtener las sedes de la base de datos:', error);
});

// Define un icono personalizado
var userIcon = L.icon({
    iconUrl: '../svg/person-solid.svg', // Reemplaza esto con la ruta a tu icono
    iconSize: [38, 95], // Tamaño del icono, ajusta según necesites
    iconAnchor: [22, 94], // Punto del icono que corresponderá a la ubicación del marcador
    popupAnchor: [-3, -76] // Punto desde donde se abrirá el popup
});

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
        const currentLocation = [position.coords.latitude, position.coords.longitude];
        var marketUser = L.marker(currentLocation, {icon: userIcon}).addTo(map)
            .bindPopup('Ubicación actual');
        map.setView(currentLocation, 13);

        marketUser.on('click', function() {
        });
    });
}

function getSedesFromDatabase() {
    return fetch('../crud/crud_sedes.php')
        .then(response => response.json());
}

