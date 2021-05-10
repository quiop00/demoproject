<table>
        <thead class="andi">
            <tr>
                <th class="width" >id</th>
                <th class="width" >title</th>
                <th class="width" >email</th>
            </tr>
        </thead>
        <tbody>
            @if($news->count())
            @foreach($news as $i =>$cl )
            <tr>
                <td>
               <a href="/admin/news/edit/{{$cl->id}}"> {{$cl->id}}</a>
                </td>
                <td>
                {{$cl->title}}
                </td>
                <td>
                {{$cl->email}}
                </td>
                <td >
                    <a class="btn-default btn-xs" >
                        <i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs" href="delete/{{$cl->id}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>