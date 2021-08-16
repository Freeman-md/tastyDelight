<template>
  <Head :title="location.name" />

  <Link :href="route('locations')" class="fixed z-10 flex items-center justify-center w-10 h-10 p-5 text-2xl font-bold text-white border-4 rounded-full cursor-pointer bg-light-purple border-dark-purple top-4 right-2">
    <span class="fa fa-times"></span>
  </Link>  

  <Link :href="route('location.meals', { location })" class="fixed z-10 button button-purple button-xlg bottom-10 right-10">Next</Link> 

  <div class="fixed inset-0">
    <img :src="location.background" class="object-cover object-center w-full h-full" :alt="location.name" />
  </div>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
  props: {
    location: Object
  },
  components: {
    Head,
    Link,
  },
}
</script>