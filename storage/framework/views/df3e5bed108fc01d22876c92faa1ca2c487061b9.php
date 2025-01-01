<?php if (isset($component)) { $__componentOriginalbd7cadf8083432147e94672f9bc99dff36f0e816 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Admin\Index::class, ['user' => $user,'isAdmin' => $isAdmin]); ?>
<?php $component->withName('admin.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if(!$isAdmin): ?> <!-- Only show content-wrapper if the user is not an admin -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Testimonial Form</h4>
                        <p class="card-description">Add testimonial info</p>
                        <form action="<?php echo e(route('testimonial.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="reviewname">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="reviewname"
                                    name="reviewname"
                                    placeholder="Input Client Name"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="reviewbio">Bio</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="reviewbio"
                                    name="reviewbio"
                                    placeholder="Input Client Bio"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="reviewrating">Rating</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="reviewrating"
                                    name="reviewrating"
                                    placeholder="Input review Rating up to 2 decimal places"
                                    pattern="[0-9]+([\.,][0-9]+)?" 
                                    step="0.01"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label>Image upload</label>
                                <div class="input-group col-xs-12">
                                    <input
                                        type="file"
                                        class="form-control file-upload-info"
                                        placeholder="Upload review image"
                                        id="reviewimage"
                                        name="reviewimage"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <img id="tempreviewimage" src="#" alt="temp-uploaded-img" class="h-auto shadow-sm w-1/2" style="display: none" />
                            </div>

                            <div class="form-group">
                                <label for="reviewtext">Review</label>
                                <textarea
                                    class="form-control"
                                    id="reviewtext"
                                    name="reviewtext"
                                    rows="4"
                                    required
                                    placeholder="Input Client Review"
                                ></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Add</button>
                            <a href="<?php echo e(route('testimonial.index')); ?>" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?> <!-- Show an alert message if the user is an admin -->
    <div class="alert alert-warning">
        <p>Only customers can access the testimonial form.</p>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary">Return to Dashboard</a>
    </div>
    <?php endif; ?>

    <script>
        var imgInput = document.getElementById("reviewimage");		
        imgInput.addEventListener('change', (event) => {
            if (event.target.files[0]) {
                var reader = new FileReader();
                var imgTemp = document.getElementById("tempreviewimage");	  
                reader.onload = function (e) {
                    imgTemp.setAttribute("src", e.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);

                if (imgTemp.style.display === "inline") {
                    imgTemp.style.display = "block";
                } else {
                    imgTemp.style.display = "inline";
                }
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd7cadf8083432147e94672f9bc99dff36f0e816)): ?>
<?php $component = $__componentOriginalbd7cadf8083432147e94672f9bc99dff36f0e816; ?>
<?php unset($__componentOriginalbd7cadf8083432147e94672f9bc99dff36f0e816); ?>
<?php endif; ?>
<?php /**PATH G:\BRACU\10th Semester (Fall-24)\CSE470\Project\Restaurant_Management-Laravel-Project\resources\views/admin/pages/review/createreview.blade.php ENDPATH**/ ?>