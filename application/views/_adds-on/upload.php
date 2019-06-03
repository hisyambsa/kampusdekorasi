<!-- cara penggunaaan -->
<!-- 
    <div class="form-group">
      <label for="varchar">Foto Karyawan ( max: 2MB dan jpg/jpeg/png ) </label><?php echo form_error('foto_karyawan') ?>
      <div class="text-danger" for="varchar"><?php  if (isset($foto)) {
        echo $foto;
      } ?></div>
      <div id="image-preview">
        <div class="fileupload-wrapper">
          <?php if ($button=='Ubah'): ?>
            <input data-max-file-size="2M" type="file" name="foto_karyawan" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('uploads/data_karyawan/foto_karyawan/').$foto_karyawan; ?>" />
            <?php else: ?>
              <input data-max-file-size="2M" type="file" name="foto_karyawan" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('img/upload_foto.jpg'); ?>" />
            <?php endif ?>
            
          </div>
        </div>
      </div>
 -->
<style>
  .mdb-upload{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;position:relative;cursor:pointer;overflow:hidden;width:100%;max-width:100%;height:200px;padding:5px 10px;font-size:1rem;text-align:center;color:#ccc}.fileupload-wrapper .card.card-body.has-error .mdb-upload-message .mdb-error,.fileupload-wrapper .card.card-body.has-preview .btn.btn-sm.btn-danger{display:block}.mdb-upload i{font-size:3rem}.mdb-upload .mask.rgba-stylish-slight{opacity:0;-webkit-transition:all .15s linear;-o-transition:all .15s linear;transition:all .15s linear}.mdb-upload:hover .mask.rgba-stylish-slight{opacity:.8}.fileupload-wrapper .card.card-body.has-error{border-color:#f34141}.fileupload-wrapper .card.card-body.has-error:hover .mdb-errors-container{visibility:visible;opacity:1;-webkit-transition-delay:0s;-o-transition-delay:0s;transition-delay:0s}.fileupload-wrapper .card.card-body.disabled input{cursor:not-allowed}.fileupload-wrapper .card.card-body.disabled:hover{background-image:none;-webkit-animation:none;animation:none}.fileupload-wrapper .card.card-body.disabled .mdb-upload-message{opacity:.5;text-decoration:line-through}.fileupload-wrapper .card.card-body.disabled .mdb-infos-message{display:none}.fileupload-wrapper .card.card-body input{position:absolute;top:0;right:0;bottom:0;left:0;height:100%;width:100%;opacity:0;cursor:pointer;z-index:5}.fileupload-wrapper .card.card-body .mdb-upload-message{position:relative;top:50px;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.fileupload-wrapper .card.card-body .mdb-upload-message span.file-icon{font-size:50px;color:#ccc}.fileupload-wrapper .card.card-body .mdb-upload-message p{margin:5px 0 0}.fileupload-wrapper .card.card-body .mdb-upload-message p.mdb-error{color:#f34141;font-weight:700;display:none}.fileupload-wrapper .card.card-body .btn.btn-sm.btn-danger{display:none;position:absolute;opacity:0;z-index:7;top:10px;right:10px;-webkit-transition:all .15s linear;-o-transition:all .15s linear;transition:all .15s linear}.fileupload-wrapper .card.card-body .mdb-preview{display:none;position:absolute;z-index:1;background-color:#fff;padding:5px;width:100%;height:100%;top:0;right:0;bottom:0;left:0;overflow:hidden;text-align:center}.fileupload-wrapper .card.card-body .mdb-preview .mdb-render .mdb-preview-img{width:100%;height:100%;background-color:#fff;-webkit-transition:border-color .15s linear;-o-transition:border-color .15s linear;transition:border-color .15s linear;-o-object-fit:cover;object-fit:cover}.fileupload-wrapper .card.card-body .mdb-preview .mdb-render i{font-size:80px;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);position:absolute;color:#777}.fileupload-wrapper .card.card-body .mdb-preview .mdb-render .mdb-extension{position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);margin-top:10px;text-transform:uppercase;font-weight:900;letter-spacing:-.03em;font-size:1rem;color:#fff;width:42px;white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis}.fileupload-wrapper .card.card-body .mdb-preview .mdb-infos{position:absolute;left:0;top:0;right:0;bottom:0;z-index:3;background:rgba(0,0,0,.7);opacity:0;-webkit-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}.fileupload-wrapper .card.card-body .mdb-preview .mdb-infos .mdb-infos-inner{position:absolute;top:50%;-webkit-transform:translate(0,-40%);-ms-transform:translate(0,-40%);transform:translate(0,-40%);-webkit-backface-visibility:hidden;backface-visibility:hidden;width:100%;padding:0 20px;-webkit-transition:all .2s ease;-o-transition:all .2s ease;transition:all .2s ease}.fileupload-wrapper .card.card-body .mdb-preview .mdb-infos .mdb-infos-inner p{padding:0;margin:0;position:relative;width:100%;white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;color:#fff;text-align:center;line-height:25px;font-weight:700}.fileupload-wrapper .card.card-body .mdb-preview .mdb-infos .mdb-infos-inner p.mdb-infos-message{margin-top:15px;padding-top:15px;font-size:12px;position:relative;opacity:.5}.fileupload-wrapper .card.card-body .mdb-preview .mdb-infos .mdb-infos-inner p.mdb-infos-message::before{content:"";position:absolute;top:0;left:50%;-webkit-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);background:#fff;width:30px;height:2px}.fileupload-wrapper .card.card-body:hover .btn.btn-sm.btn-danger,.fileupload-wrapper .card.card-body:hover .mdb-preview .mdb-infos{opacity:1}.fileupload-wrapper .card.card-body:hover .mdb-preview .mdb-infos .mdb-infos-inner{margin-top:-5px}.fileupload-wrapper .card.card-body.touch-fallback{height:auto!important}.fileupload-wrapper .card.card-body.touch-fallback:hover{background-image:none;-webkit-animation:none;animation:none}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview{position:relative;padding:0}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-render{display:block;position:relative}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-infos .mdb-infos-inner p.mdb-infos-message::before,.fileupload-wrapper .card.card-body.touch-fallback.has-preview .mdb-upload-message{display:none}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-render .mdb-font-file{position:relative;-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0);top:0;left:0}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-render .mdb-font-file::before{margin-top:30px;margin-bottom:30px}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-render img{position:relative;-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0)}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-infos{position:relative;opacity:1;background:0 0}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-infos .mdb-infos-inner{position:relative;top:0;-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0);padding:5px 90px 5px 0}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-infos .mdb-infos-inner p{padding:0;margin:0;position:relative;width:100%;white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;color:#777;text-align:left;line-height:25px}.fileupload-wrapper .card.card-body.touch-fallback .mdb-preview .mdb-infos .mdb-infos-inner p.mdb-infos-message{margin-top:0;padding-top:0;font-size:18px;position:relative;opacity:1}.fileupload-wrapper .card.card-body.touch-fallback .mdb-upload-message{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0);padding:40px 0}.fileupload-wrapper .card.card-body.touch-fallback .btn.btn-sm.btn-danger{top:auto;bottom:23px;opacity:1}.fileupload-wrapper .card.card-body.touch-fallback:hover .mdb-preview .mdb-infos .mdb-infos-inner{margin-top:5rem}.fileupload-wrapper .card.card-body .mdb-loader{position:absolute;top:15px;right:15px;display:none;z-index:9}.fileupload-wrapper .card.card-body .mdb-loader::after{display:block;position:relative;width:20px;height:20px;-webkit-animation:rotate .6s linear infinite;animation:rotate .6s linear infinite;-webkit-border-radius:100%;border-radius:100%;border-top:1px solid #ccc;border-bottom:1px solid #777;border-left:1px solid #ccc;border-right:1px solid #777;content:""}.fileupload-wrapper .card.card-body .mdb-errors-container{position:absolute;left:0;top:0;right:0;bottom:0;z-index:3;background:rgba(243,65,65,.8);text-align:left;visibility:hidden;opacity:0;-webkit-transition:visibility 0s linear .15s,opacity .15s linear;-o-transition:visibility 0s linear .15s,opacity .15s linear;transition:visibility 0s linear .15s,opacity .15s linear}.fileupload-wrapper .card.card-body .mdb-errors-container ul{padding:10px 20px;margin:0;position:absolute;left:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.fileupload-wrapper .card.card-body .mdb-errors-container ul li{margin-left:20px;color:#fff;font-weight:700}.fileupload-wrapper .card.card-body .mdb-errors-container.visible{visibility:visible;opacity:1;-webkit-transition-delay:0s;-o-transition-delay:0s;transition-delay:0s}.fileupload-wrapper .card.card-body~.mdb-errors-container ul{padding:0;margin:15px 0}.fileupload-wrapper .card.card-body~.mdb-errors-container ul li{margin-left:20px;color:#f34141;font-weight:700}@-webkit-keyframes rotate{0%{-webkit-transform:rotateZ(-360deg);transform:rotateZ(-360deg)}100%{-webkit-transform:rotateZ(0);transform:rotateZ(0)}}@keyframes rotate{0%{-webkit-transform:rotateZ(-360deg);transform:rotateZ(-360deg)}100%{-webkit-transform:rotateZ(0);transform:rotateZ(0)}}
</style>
<style type="text/css">
  #image-preview {
    width: 400px;
    height: 400px;
    position: relative;
    overflow: hidden;
    background-color: #ffffff;
    color: #ecf0f1;
  }
  #image-preview input {
    line-height: 200px;
    font-size: 200px;
    position: absolute;
    opacity: 0;
    z-index: 10;
  }
  #image-preview label {
    position: absolute;
    z-index: 5;
    opacity: 0.8;
    cursor: pointer;
    background-color: #bdc3c7;
    width: 200px;
    height: 50px;
    font-size: 20px;
    line-height: 50px;
    text-transform: uppercase;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    text-align: center;
  }
</style>


