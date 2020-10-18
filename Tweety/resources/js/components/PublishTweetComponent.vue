<script>
    module.exports = {
    props: {
      id: {
        type: String,
        required: true
      },
      label: {
        type: String,
        required: true
      },
      limit: {
        type: Number,
        required: true
      },
    },
    data: function() {
        return {
        text: '',
        maxCharacters: 255,
        isVisible: false
        }
    },
    computed: {
      charactersRemaining: function () {
        return this.maxCharacters - this.text.length;
      },
      charactersOver: function () {
        return this.isOver() ? this.text.length - this.maxCharacters : 0;
      }
    },
    methods: {
      postTweet() {
            axios.post('/tweets', { body: this.text }),
                this.text = "",
                Vue.$toast.info('Tweet posted!', {}),
                this.isVisible= false
        },
      isOver: function () {
       return this.charactersRemaining < 0; 
      }
    },
    mounted: function () {
      this.maxCharacters = this.limit;
    }
  }
</script>

<style>
.over {
      color: red;
    }
.bellow {
    color: green
  }
</style>
