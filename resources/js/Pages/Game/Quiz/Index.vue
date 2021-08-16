<template>
  <Head title="Quiz" />

  <div class="flex flex-col w-full h-full p-4 space-y-4 bg-saturated-orange">
      
    <!-- Title -->
    <h1 class="text-2xl font-bold uppercase">Quiz ({{ location.name }})</h1>

    <div class="grid items-start gap-6 md:grid-cols-2">
      
      <div
        v-for="(question, index) in questions"
        :key="index"
        class="flex items-start justify-between"
      >
        <div class="flex items-start space-x-4">
          <span class="flex items-center justify-center w-8 h-8 p-2 text-sm font-bold text-white rounded-full bg-dark-green">{{++index}}</span>
          
          <div class="flex flex-col space-y-2">
            <span class="text-lg font-bold">{{ question.text }}</span>
            <div class="flex flex-col space-y-1">
              <div 
                v-for="(answer, index) in question.answers"
                :key="index"
                class="flex items-center space-x-2 text-sm font-semibold cursor-pointer"
                @click="setAnswer(question, answer)" 
              >
                <button 
                  class="w-3 h-3 rounded-full"
                  :class="checkAnswer(question, answer)"
                >
                </button>
                <span>{{ answer.text }}</span>
              </div>
            </div>
          </div>
        </div>

        <img :src="[index > 3 ? `/images/food-${--index}.png` : `/images/food-${++index}.png`]" class="object-cover object-center w-16 h-16 sm:w-20 sm:h-20 md:w-32 md:h-32 lg:h-40 lg:w-40"/>
      </div>
    
    </div>

    <div>
      <BreezeButton :disabled="!quizCompleted" :class="{'opacity-25': !quizCompleted}" class="button button-orange button-sm" @click="submitQuiz">Submit</BreezeButton>
    </div>
      
  </div>

</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
import BreezeButton from '@/Components/Button.vue'
export default {
  props: {
    location: Object,
    quiz: Object,
  },
  components: {
    Head,
    Link,
    BreezeButton
  },
  data() {
    return {
      answers: [ null, null, null, null, null, null ],
    };
  },
  computed: {
    questions() {
      return this.quiz.map(question => {
        return {...question, selectedAnswer: null}
      })
    },
  },
  methods: {
    setAnswer(question, answer) {
      question.selectedAnswer = answer.id
      this.checkAnswer(question, answer)
      console.log(this.quizCompleted())
    },
    checkAnswer(question, answer) {
      return question.selectedAnswer !== answer.id ? 'border-2 border-black' : 'bg-black'
    },
    quizCompleted() {
      return this.questions.every(question => {
        console.log(question)
        return question.selectedAnswer !== null
      })
    },
    submitQuiz() {
      Inertia.post(this.route('location.quiz', { location }), {
        questions: this.questions
      })
    },
  }
}
</script>