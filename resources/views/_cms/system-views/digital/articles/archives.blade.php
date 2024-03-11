<h3 class="h3">Articles</h3>
<h6 class="h6">Table View</h6>
<hr class="my-4">
<table class="table table-hover" id="genericTable">
    <thead>
    <tr>
        <th>Date Created</th>
        <th>Article ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Published Date</th>
        <th><center>Details</center></th>
    </tr>
    </thead>
    <tbody>
    @forelse($data['article'] as $articles)
        <?php try { ?>
        <tr>
            <td>{{ $articles->created_at }}</td>
            <td><strong style="color:red">{{ $articles->unique_id }}</strong></td>
            <td>{{ Str::limit($articles->title, $limit = 25, $end = '...') }}</td>
            <td>{{ $articles->Category->name }}</td>
            <td>
                @if( $articles->published_at === null )
                    <span id="" style="color:red">Not Published</span>
                @else
                    {{ date('F d, Y', strtotime($articles->published_at)) }}
                @endif
            </td>
            <td>
                <a href="{{ route('articles.show', $articles->id) }}" class="text-muted">Show</a>
            </td>
        </tr>
        <?php } catch (ErrorException $e) {?>
        <td>
            <div class="alert alert-danger text-center">
                Deleted Data
            </div>
        </td>
        <?php } ?>
    @empty
        <tr>
            <td colspan="5">
                <div class="alert alert-danger text-center">
                    NO DATA FOUND
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
