<div class="container mt-4">
    <div id="videoThumbnails" class="row">
        <!-- Thumbnails will appear here -->
        <div class="col-4 mb-4" onclick="showVideo('8i0rcuv8I6I')">
            <img src="https://img.youtube.com/vi/8i0rcuv8I6I/default.jpg" alt="Video Title" class="img-thumbnail">
            <p>Video Title 1</p>
        </div>
        <div class="col-4 mb-4" onclick="showVideo('VIDEO_ID_2')">
            <img src="https://img.youtube.com/vi/VIDEO_ID_2/default.jpg" alt="Video Title" class="img-thumbnail">
            <p>Video Title 2</p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <iframe id="player" width="640" height="390" src="" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>

<script>
    function showVideo(videoId) {
        document.getElementById('player').src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        $('#videoModal').modal('show');
    }
</script>
