<style>
    .video-card-container {
        position: relative;
        min-height: 200px;
        max-height: 200px;
    }
    .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 2em;
        color: white;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }
    .card-img-top img {
        width: 100%;
        height: auto;
    }
</style>

<section class="second clearfix">
    <div class="row">
        @foreach($videos as $video)
            <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
                <a href="javascript:void(0);" class="text-decoration-none video" data-video-url="{{$video->url}}">
                    <div class="card" style="width: 100%;">
                        <figure class="card-img-top video-card-container">
                            <img src="{{$video->thumbnail}}" class="img-fluid" style="object-fit: contain !important;" alt="{{$video->title}}">
                            <span class="play-icon">
                                <i class="fas fa-3x fa-play-circle" style="color: #fbaa1f"></i> <!-- Font Awesome Play Icon -->
                            </span>
                        </figure>
                        <div class="card-footer text-center">
                            <h5 class="card-title">{{$video->title}}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>

<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                <iframe id="videoIframe" width="100%" height="400" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const videoArticles = document.querySelectorAll('.video');

        videoArticles.forEach(video => {
            video.addEventListener('click', function() {
                const videoUrl = this.getAttribute('data-video-url');
                const iframe = document.getElementById('videoIframe');

                // Make sure the URL is an embed URL
                iframe.setAttribute('src', `${videoUrl}?autoplay=1&mute=1`);

                const videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
                videoModal.show();

                videoModal._element.addEventListener('hidden.bs.modal', function() {
                    iframe.setAttribute('src', ''); // Stop video when modal is closed
                });
            });
        });
    });

</script>