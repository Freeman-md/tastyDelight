<template>
  <Head :title="character.name" />

  <div class="fixed flex flex-col w-1/2 px-24 pt-10 pb-16 space-y-6 text-4xl font-semibold text-left text-black border-4 ml-60 mt-14 rounded-3xl top-28 left-20" :class="[character.gender === 'Male' ? 'bg-green border-dark-green' : 'bg-yellow border-dark-yellow']">
    <h3>{{ character.name }}</h3>
    <p class="text-xl font-medium">
      {{ character.description }}
    </p>
    <Link :href="route('characters')" class="absolute flex items-center justify-center w-10 h-10 p-2 text-2xl font-bold text-white border-4 rounded-full -right-5 -top-10 bg-light-purple border-dark-purple">
      <span class="fa fa-times"></span>
    </Link>
  </div>

  <div class="fixed z-10 ml-20 mb-14 bottom-10 left-14">
    <img class="object-contain object-center h-96 w-96" :src="character.image" :alt="character.name" />
  </div>
  
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest'
export default {
  layout: BreezeGuestLayout,
  components: {
    Head, 
    Link
  },
  props: {
    character: {
      type: Object,
      required: true
    }
  }
}
</script>