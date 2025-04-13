

  // Initialize all maps when the page loads
  function initMaps() {
    const accessToken = 'pk.a2bc8f0c2c97d7e8e1048a4f221b47be'; // Replace with your actual API key
    
    const locations = [
      {
        id: 'map1',
        coordinates: [77.2167, 28.6315], // Connaught Place, Delhi
        title: 'FoodieHub Restaurant'
      },
      {
        id: 'map2',
        coordinates: [72.8311, 19.1350], // Andheri West, Mumbai
        title: 'Fresh Bites Event'
      }
    ];

    locations.forEach(location => {
      const map = new maplibregl.Map({
        container: location.id, // Map container ID
        style: `https://tiles.locationiq.com/v3/streets/vector.json?key=${accessToken}`, // LocationIQ map style
        center: location.coordinates, // Coordinates of the location
        zoom: 14
      });

      // Add navigation controls to the map (optional)
      map.addControl(new maplibregl.NavigationControl());

      // Add a marker to the map
      new maplibregl.Marker()
        .setLngLat(location.coordinates)
        .setPopup(new maplibregl.Popup().setText(location.title))
        .addTo(map);
    });
  }

  // Wait for the DOM to fully load and then initialize maps
  document.addEventListener('DOMContentLoaded', () => {
    initMaps();
  });
// Handle Accept Pickup button
document.addEventListener('DOMContentLoaded', () => {
  const acceptButtons = document.querySelectorAll('.accept-btn');

  acceptButtons.forEach(button => {
    button.addEventListener('click', () => {
      alert('Pickup accepted! Further instructions will be sent to your registered number.');
      button.disabled = true;
      button.textContent = 'Accepted';
      button.style.backgroundColor = '#ccc';
    });
  });
});
