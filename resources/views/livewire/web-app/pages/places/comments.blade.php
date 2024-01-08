<div>
    <div class="comments-area mb-30">
        <h3 class="sub-title">Comments</h3>
        <ol class="comment-list">
            @foreach ($comments as $data)
                <li class="comment">
                    <div class="comment-body">
                        <div class="comment-author">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="comment-content">
                            <div class="comment-metadata">
                                <h4 class="name">{{ $data->name }}</h4>
                            </div>
                            <p>{{ $data->comment }}</p>
                            <ul class="list">
                                <li>
                                    <time datetime="{{ $data->created_at->format('M d, Y') }}" title="{{ $data->created_at->format('M d, Y') }}" class="block">{{ $data->created_at->diffForHumans() }}</time>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if ($data->reply)
                        <ol class="children">
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-author">
                                        <i class="bx bx-user-check"></i>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-metadata">
                                            <h4 class="name">{{ $data->reply->name }}</h4>
                                        </div>
                                        <p>{{ $data->reply->comment }}</p>
                                        <ul class="list">
                                            <li>
                                                <time datetime="{{ $data->reply->created_at->format('M d, Y') }}" title="{{ $data->reply->created_at->format('M d, Y') }}" class="block">{{ $data->reply->created_at->diffForHumans() }}</time>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
    <div class="comment-reply">
        <form class="comment-form" wire:submit="saveComment">
            <h3 class="sub-title">Post comment</h3>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-icon"><i class="bx bx-user"></i></div>
                        <input type="text" wire:model="name" class="form-control" name="name" placeholder="Name" required="required" maxlength="56" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-icon"><i class="bx bx-at"></i></div>
                        <input type="email" wire:model="email" class="form-control" name="email" placeholder="Email" required="required" maxlength="56" />
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                        <div class="input-icon textarea"><i class="bx bx-envelope"></i></div>
                        <textarea name="message" wire:model="comment" class="form-control" placeholder="Write Comment" required="required" maxlength="255" rows="6"></textarea>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <x-web-app.alert.success :message="session('success')" />
            @endif
            <button type="submit" wire:offline.attr="disabled" wire:loading.attr="disabled" class="btn-primary">Post comment</button>
        </form>
    </div>
</div>
