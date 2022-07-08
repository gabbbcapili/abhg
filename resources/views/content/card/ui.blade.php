  <style type="text/css">
    .backgroundColor-{
      background-color:  #fff;
    }
    @foreach(App\Models\Design::all() as $design)
      .menuBackgroundColor-{{ $design->id }}{
        background-color: {{ $design->menuBackgroundColor }};
      }
      .menuTextColor-{{ $design->id }}{
        color : {{ $design->menuTextColor  }};
      }
      .headerColor-{{ $design->id }}{
        color : {{ $design->headerColor  }};
      }
      .backgroundColor-{{ $design->id }}{
        background-color : {{ $design->backgroundColor  }};
        @if($design->backgroundImage)
        background: url({{ asset('images/ui/' . $design->backgroundImage)  }}) {{ $design->backgroundStyle }} {{  $design->menuBackgroundColor }};
        @if($design->group == 5)
        background-size: auto 100%;
        @endif
        @endif
      }
      .textColor-{{ $design->id }}{
        color : {{ $design->textColor  }};
      }
      .linkColor-{{ $design->id }}{
        color : {{ $design->linkColor  }};
      }
      .headerColor-{{ $design->id }}{
        color : {{ $design->headerColor  }};
      }
      .button-{{ $design->id }}{
        background-color : {{ $design->buttonBackgroundColor  }} !important;
        color: {{ $design->buttonTextColor  }} !important;
        border-radius : {{ $design->buttonBorderRadius  }} !important;
        border : {{ $design->buttonBorder  }} !important;
      }





    @endforeach
    /*backgroundGradientStartColor
    backgroundGradientEndColor
    backgroundGradientStyle*/

  </style>
