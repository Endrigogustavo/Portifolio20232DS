 // Este exemplo usa o widget Place Autocomplete para permitir que o usuário pesquise
  // para e selecione um local. A amostra então exibe uma janela de informações contendo
  // o ID do local e outras informações sobre o local que o usuário possui
  // selecionado.
  // Este exemplo requer a biblioteca Places. Incluir as bibliotecas=locais
  //parâmetro quando você carrega a API pela primeira vez. Por exemplo:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: {
        lat: -23.5475000,
        lng: -46.6361100
      },
      zoom: 13,
    });
    const input = document.getElementById("pac-input");
 // Especifique apenas os campos de dados do local necessários.
    const autocomplete = new google.maps.places.Autocomplete(input, {
      fields: ["place_id", "geometry", "formatted_address", "name"],
    });
 
    autocomplete.bindTo("bounds", map);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
 
    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");
 
    infowindow.setContent(infowindowContent);
 
    const marker = new google.maps.Marker({
      map: map
    });
 
    marker.addListener("click", () => {
      infowindow.open(map, marker);
    });
    autocomplete.addListener("place_changed", () => {
      infowindow.close();
 
      const place = autocomplete.getPlace();
 
      if (!place.geometry || !place.geometry.location) {
        return;
      }
 
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }
 
      
// Defina a posição do marcador usando o ID do local e a localização.
      // @ts-ignore Deve estar em @typings/googlemaps.
      marker.setPlace({
        placeId: place.place_id,
        location: place.geometry.location,
      });
      marker.setVisible(true);
      infowindowContent.children.namedItem("place-name").textContent = place.name;
      infowindowContent.children.namedItem("place-id").textContent =
        place.place_id;
      infowindowContent.children.namedItem("place-address").textContent =
        place.formatted_address;
      infowindow.open(map, marker);
    });
  }
 
  window.initMap = initMap;