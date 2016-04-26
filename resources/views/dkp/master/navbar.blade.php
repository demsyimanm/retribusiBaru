<style>
  body {
    padding: 1em;
  }
  .ui.menu {
    margin: 3em 0em;
  }
  .ui.menu:last-child {
    margin-bottom: 110px;
  }
  </style>

  <!--- Example Javascript -->
  <script>
  $(document)
    .ready(function() {
      $('.ui.menu .ui.dropdown').dropdown({
        on: 'hover'
      });
      $('.ui.menu a.item')
        .on('click', function() {
          $(this)
            .addClass('active')
            .siblings()
            .removeClass('active')
          ;
        })
      ;
    })
  ;
  </script>

<div class="ui fixed inverted menu">
 <div class="ui container">
    <div class="header item"><img class ="logo" src="{{URL::to('assets/image/logosurabaya.png')}}" style="width:50px; padding-right:15px;"> DKP Surabaya</div>
    <a class="item" href="{{url('')}}">Home</a>
    <div class="ui dropdown item">Input Data <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{url('retribusi/tunggakanPemerintah')}}">Data Tunggakan Pemerintah</a>
        <a class="item" href="{{url('retribusi/tunggakanSwasta')}}">Data Tunggakan Swasta</a>
        <div class="ui fitted divider"> </div>
        <a class="item" href="{{url('retribusi/dataPemerintah')}}">Data Retribusi Pemerintah</a>
        <a class="item" href="{{url('retribusi/dataSwasta')}}">Data Retribusi Swasta</a>
        <div class="ui fitted divider"> </div>
        <a class="item" href="{{url('retribusi/banding')}}">Bandingkan Data</a>
      </div>
    </div>
    <div class="ui dropdown item">Data Nunggak<i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{url('list/nunggak/pemerintah')}}">Pemerintah</a>
        <a class="item" href="{{url('list/nunggak/swasta')}}">Swasta</a>
      </div>
    </div>
    <div class="ui dropdown item">Data Lunas<i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{url('list/lunas/pemerintah')}}">Pemerintah</a>
        <a class="item" href="{{url('list/lunas/swasta')}}">Swasta</a>
      </div>
    </div>
    <a class="item" href="{{url('survey/')}}">Survey Baru</a>
    <!-- <a class="item">Pelanggan Baru</a> -->
   <!--  <div class="right menu">
      <a class="item">Logout</a>
    </div> -->
  </div>
</div>