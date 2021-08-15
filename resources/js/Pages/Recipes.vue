<template>
  <Head title="Recipes" />

  <!-- Recipe Booklet -->
  

  <!-- Download Now -->
  <button class="fixed z-10 mr-24 uppercase button button-orange button-xlg bottom-20 right-60">Download!</button> 
  
  <div class="fixed w-5/6 h-3/4 top-10 left-20">
    <img :src="$page.props.images.backgrounds.recipes" class="object-cover object-center w-full cursor-default" />
  </div>
  
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest'
export default {
  layout: BreezeGuestLayout,
  components: {
    Head
  }
}
</script>