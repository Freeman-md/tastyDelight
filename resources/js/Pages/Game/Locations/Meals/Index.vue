<template>
  <Head title="Meals" />

  <!-- Right Top Hand Side -->
  <div class="fixed z-10 flex items-center space-x-4 top-4 right-2">
    <button @click="close" class="flex items-center justify-center w-10 h-10 p-5 text-2xl font-bold text-white border-4 rounded-full cursor-pointer bg-light-purple border-dark-purple">
      <span class="fas fa-cog"></span>
    </button> 
    <Link :href="route('index')" class="flex items-center justify-center w-10 h-10 p-5 text-2xl font-bold text-white border-4 rounded-full cursor-pointer bg-light-purple border-dark-purple">
      <span class="fa fa-home"></span>
    </Link>    
  </div> 

  <div class="fixed z-20 grid w-3/4 grid-cols-3 gap-6 top-24 left-10">
    <Link 
      v-for="(meal, index) in meals"
      :key="index"
      :href="route('location.meals.show', { location, meal })" class="w-40 h-40"
    >
      <img :src="meal.image" class="object-cover object-center w-full h-full" />
    </Link>
  </div>

  <!-- Take Quiz Button -->
  <!-- <Link :href="route('location.quiz', { location })" class="fixed z-10 button button-purple button-xlg bottom-10 right-10">Take Quiz</Link>  -->

  <div class="fixed inset-0">
    <img :src="bgImage" class="object-cover object-center w-full h-full" alt="Background" />
  </div>

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
  props: {
    location: Object,
    meals: Object,
  },
  data() {
    return {
      bgImage: null,
    }
  },
  components: {
    Head,
    Link,
  },
  created() {
    let location = window.location.pathname.split('/game/locations/')[1].split('/meals')[0]
    this.bgImage = this.$page.props.images.backgrounds[location]
  }
}
</script>