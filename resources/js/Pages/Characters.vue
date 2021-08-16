<template>
  <Head title="Characters" />

  <div class="flex flex-col items-start justify-center h-full space-y-8 responsive-container">

    <img :src="$page.props.images.characters.frame" class="object-cover object-center" />

    <div class="flex flex-col items-center justify-center w-full space-y-4 sm:space-y-0 sm:space-x-12 sm:flex-row">

      <Link 
        v-for="(character, index) in characters"
        :key="index"
        class="flex flex-col items-center justify-center space-y-4"
        :href="route('character', {character})"
      >
        <img :src="character.avatar" class="object-cover object-center w-40 h-40 sm:w-60 sm:h-60" :alt="character.name"/>
        <span class="button button-light-purple button-sm">{{ character.name }}</span>
      </Link>

    </div>

  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest'
export default {
  layout: BreezeGuestLayout,
  props: {
    characters: {
      type: Object,
      required: true,
    }
  },
  components: {
    Head, 
    Link
  },
}
</script>