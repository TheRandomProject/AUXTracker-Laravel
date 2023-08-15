 <script>
  import moment from 'moment'
  
  export default {
    data () {
      return {
        day: moment().format('D'),
        hour: moment().format('H'),
        minute: moment().format('m'),
        second: moment().format('s')
      }
    },
    mounted () {
      this.timer = setInterval(() => {
        this.second++
        if (this.second === 60) {
          this.minute++
          this.second = 0
          if (this.minute === 60) {
            this.hour++
            this.minute = 0
            if (this.hour === 24) {
              this.day++
              this.hour = 0
            }
          }
        }
      }, 1000)
    },
    destroyed () {
      clearInterval(this.timer)
    }
  }
  </script>
<template>
   <div class="flex flex-col">
        <div class="flex justify-center items-center pt-8">
            <div class="w-100 text-center">
                <h1 class="text-8xl font-bold">Clock In</h1>
            </div>
        </div>

        <div class="flex justify-center items-center text-5xl mt-5">
            <div class="mr-10">
                <span class="text-white-300">{{ hour }}</span>
                <span class="text-gray-500 ml-2">hours</span> |
            </div>
            <div class="mr-10">
                <span class="text-white-300">{{ minute }}</span>
                <span class="text-gray-500 ml-2">minute</span> |
            </div>
            <div class="mr-10">
                <span class="text-white-300">{{ second }}</span>
                <span class="text-gray-500 ml-2">second</span>
            </div>
        </div>
    </div>
</template>
  
 