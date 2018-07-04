@extends('layouts.app') 
@section('content')
    <h1>{{ __('Exam Create') }}</h1>
    
    @can('建立測驗')
      {{ bs()->openForm('post', '/exam') }}
          <div class="row">
            <div class="col-sm-6">
              {{ bs()->formGroup()
                  ->label('測驗標題')
                  ->control(bs()->text('title')->placeholder('請填入測驗標題'))
                  }}

            </div>
          </div>

          {{ bs()->formGroup()
              ->label('是否啟用？')
              ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])->selectedOption(1)->inline())
              }}


          {{ bs()->submit('儲存') }}
      {{ bs()->closeForm() }}
    @else
      @component('bs::alert', ['type' => 'danger', 'animated' => true])
      @slot('heading')
          沒有「建立測驗權限！」，請登入或確認身份！
      @endslot

      @endcomponent        
    @endcan

@stop