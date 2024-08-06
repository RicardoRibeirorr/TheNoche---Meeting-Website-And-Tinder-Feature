<template>
    <time v-text="date">as</time>
</template>

<script>
    export default {
        props: ["timestamp","options"],
        methods: {
            month:function(m){
                switch (m) {
                    case 1:return "Janeiro"; break;
                    case 2:return "Fevereiro"; break;
                    case 3:return "Março"; break;
                    case 4:return "Abril"; break;
                    case 5:return "Maio"; break;
                    case 6:return "Junho"; break;
                    case 7:return "Julho"; break;
                    case 8:return "Agosto"; break;
                    case 9:return "Setembro"; break;
                    case 10:return "Outubro"; break;
                    case 11:return "Novembro"; break;
                    case 12:return "Dezembro"; break;
                }
            },
            year:function(y){
                  var d = (new Date()).getFullYear();
                  if(y==d){
                      return "";
                  }else{
                      return " de " + y;
                  }
            },
        },
        computed: {
      
            date(){
                var _temp = this.timestamp.split(" ");
                var hours = _temp[1].slice(0,5);
                _temp =_temp[0].split("-");
                var day = parseInt(_temp[2]);
                var month = parseInt(_temp[1]);
                var year = _temp[0];
                var _temp = day + " " + this.month(month) +this.year(year);
                    if(this.options && this.options.setHours && this.options.setHours==true)
                    _temp += + " as " + hours;
                return _temp;
            }
    }
    }

</script>
