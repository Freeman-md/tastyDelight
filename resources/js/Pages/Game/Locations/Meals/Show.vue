<template>
  <Head :title="meal.name" />

  <Link :href="route('location.meals', { location })" class="fixed z-10 flex items-center justify-center w-20 h-20 p-5 text-5xl font-bold text-white border-4 rounded-full cursor-pointer bg-light-purple border-dark-purple top-4 right-14">
    <span class="fa fa-times"></span>
  </Link> 

  <button v-show="meal.id !== 5" @click.prevent="getMealById" class="fixed z-10 button button-purple button-xlg bottom-10 right-10">Next</button> 

  <div class="fixed inset-0">
    <img :src="meal.background" class="object-cover object-center w-full h-full" :alt="meal.name" />
  </div>

</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
export default {
  props: {
    location: Object,
    meal: Object
  },
  components: {
    Head,
    Link,
  },
  methods: {
    getMealById() {
      Inertia.get(this.route('location.meals.show', {
        location: this.location,
        meal: ++this.meal.id 
      }))
    }
  }
}
</script>