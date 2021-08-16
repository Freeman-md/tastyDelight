<template>
  <Head title="Recipes" />

  <!-- Recipe Booklet -->
  

  <!-- Download Now -->
  <a :href="$page.props.pdf.recipes" target="_blank" class="fixed z-10 mr-24 uppercase button button-orange button-lg lg:button-xlg bottom-2 right-2 lg:bottom-20 lg:right-60">Download!</a> 
  
  <div class="fixed left-0 w-full lg:w-5/6 lg:h-3/4 top-40 md:left-4 sm:top-48 md:top-32 lg:top-10 lg:left-20">
    <img :src="$page.props.images.backgrounds.recipes" class="object-cover object-center w-full cursor-default" />
  </div>
  
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
import BreezeGuestLayout from '@/Layouts/Guest'
export default {
  layout: BreezeGuestLayout,
  components: {
    Head, Link
  }
}
</script>