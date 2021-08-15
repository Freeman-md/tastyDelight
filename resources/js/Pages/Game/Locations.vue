<template>
  <Head title="Locations" />

  <!-- Left Hand Side -->
  <div class="fixed flex items-center p-4 space-x-4 border-4 bg-light-purple border-dark-purple rounded-br-5xl -left-2 -top-2">
    <span class="text-6xl font-bold text-white fa fa-map-marker-alt"></span>
    <button @click="openModal" class="w-8 h-3 bg-white rounded-xl"></button>
    <img :src="$page.props.images.stars.bronze" alt="Bronze Star" class="w-10 h-10" />
    <img :src="$page.props.images.stars.silver" alt="Silver Star" class="w-10 h-10" />
    <img :src="$page.props.images.stars.gold" alt="Gold Star" class="w-10 h-10" />
  </div>

  <!-- Right Hand Side -->
  <div class="fixed flex items-center space-x-4 top-4 right-2">
    <button @click="close" class="flex items-center justify-center w-10 h-10 p-5 text-2xl font-bold text-white border-4 rounded-full cursor-pointer bg-light-purple border-dark-purple">
      <span class="fas fa-cog"></span>
    </button> 
    <Link :href="route('index')" class="flex items-center justify-center w-10 h-10 p-5 text-2xl font-bold text-white border-4 rounded-full cursor-pointer bg-light-purple border-dark-purple">
      <span class="fa fa-home"></span>
    </Link>    
  </div>
  
  <Link :href="route('index')" class="fixed flex flex-col items-center text-lg font-semibold border-b-4 border-l-4 border-dark-orange button button-orange button-xlg bottom-48 right-24">
    <span>Pick a City</span>
    <span>to begin</span>
    <span>exploring!</span>
  </Link>

  <GameCharacters classes="-right-14 -bottom-64" />

  <BreezeModal :show="showStarDetails" @close="closeModal">
    <div class="flex flex-col items-start space-y-4">

      <div 
        v-for="(star, index) in stars"
        :key="index"
        class="flex items-center p-4 space-x-2"
      >
        <img :src="star.image" :alt="star.name" class="w-10 h-10" />
        <button  class="w-8 h-3 bg-white rounded-xl"></button>
        <span class="text-2xl font-bold">{{ star.name }}</span>
      </div>

    </div>
  </BreezeModal>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGameLayout from '@/Layouts/Game.vue';
import BreezeModal from '@/Components/Modal.vue'
import GameCharacters from '@/Components/GameCharacters.vue'
export default {
  layout: BreezeGameLayout,
  components: {
    Head,
    Link, 
    BreezeModal,
    GameCharacters
  },
  data() {
    return {
      showStarDetails: false,
      stars: [
        {
          image: this.$page.props.images.stars.gold,
          name: 'Gold Star'
        },
        {
          image: this.$page.props.images.stars.silver,
          name: 'Silver Star'
        },
        {
          image: this.$page.props.images.stars.bronze,
          name: 'Bronze Star'
        }
      ]
    };
  },
  methods: {
    openModal() {
      this.showStarDetails = true
    },
    closeModal() {
      this.showStarDetails = false
    }
  }
}
</script>