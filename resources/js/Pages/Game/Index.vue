<template>
  <Head title="Game" />
  
  <div class="fixed flex flex-col w-1/2 p-4 space-y-12 text-3xl font-semibold text-left text-white border-4 bg-darker-green border-darkest-green rounded-3xl top-20 left-12">
    <div class="flex flex-col items-start space-y-6 text-lg font-light tracking-wider">
      <p>Hello, my name is Olanna and this is my brother, Ose! Welcome to ‘Tasty Delight!’ We are travelling with our parents todifferent parts of Nigeria! On our way, we stop at different Cities to taste their food.</p>
      <p> Join us on adventures as we learn about different  types of meals and their origins! YUMMY!</p>
    </div>
  </div>

  <Link :href="route('locations')" class="fixed z-10 button button-orange button-xlg bottom-10 left-10">Begin Adventure!</Link> 

  <GameCharacters />

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGameLayout from '@/Layouts/Game.vue';
import GameCharacters from '@/Components/GameCharacters.vue'
export default {
  layout: BreezeGameLayout,
  components: {
    Head,
    Link, 
    GameCharacters
  }
}
</script>