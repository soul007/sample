<form class="" action="{{route('statuses.store')}}" method="post">
  @include('shared.errors')
  {{ csrf_field() }}
  <textarea class="form-control" placeholder="写下你想说的...." rows="3" name="content">{{old('content')}}</textarea>
  <button type="submit" class="btn btn-primary pull-right">发布</button>
</form>
