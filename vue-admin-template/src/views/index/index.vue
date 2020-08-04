<template>
    <div class="dashboard-text">name: {{ user_name }}</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'Dashboard',
  computed: {
    ...mapGetters([
      'user_name'
    ])
  }
}
</script>

<style lang="scss" scoped>
</style>
