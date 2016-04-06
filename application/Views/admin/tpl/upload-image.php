@section=header@
    <link rel="stylesheet" type="text/css" href="/src/lib/webuploader-0.1.5/css/webuploader.css" />
    <!-- <link rel="stylesheet" type="text/css" href="/src/lib/webuploader-0.1.5/examples/image-upload/style.css" /> -->
        <link rel="stylesheet" type="text/css" href="/assets/lib/webuploader/image-upload/style.css" />

@end@

@section=content@
<div id="image-uploader">
    <div class="queueList">
        <div id="dndArea" class="placeholder">
            <div id="filePicker"></div>
            <p>或将照片拖到这里，单次最多可选300张</p>
        </div>
    </div>
    <div class="statusBar" style="display:none;">
        <div class="progress">
            <span class="text">0%</span>
            <span class="percentage"></span>
        </div><div class="info"></div>
        <div class="btns">
            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
        </div>
    </div>
</div>
@end@

@section=footer@
<script type="text/javascript" src="/src/lib/webuploader-0.1.5/dist/webuploader.js"></script>
<script type="text/javascript" src="/assets/lib/webuploader/image-upload/upload.js"></script>
@end@