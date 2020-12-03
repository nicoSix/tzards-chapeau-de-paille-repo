<template>
  <div>
    <div class="google-map" ref="googleMap"></div>
  </div>
</template>

<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'

export default {
  props: {
    mapConfig: Object,
    apiKey: String,
  },

  data() {
    return {
      google: null,
      map: null
    }
  },

  async mounted() {
    const googleMapApi = await GoogleMapsApiLoader()
    this.google = googleMapApi
    this.initializeMap()
  },

  methods: {
    initializeMap() {
      const mapContainer = this.$refs.googleMap
      this.map = new this.google.maps.Map(
        mapContainer, this.mapConfig
      )
    }
  }
}

</script>