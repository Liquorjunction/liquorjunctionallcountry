

    
    <div class="tab-pane <?php echo e(Session::get('active_tab') === 'maintenance' ? 'active' : ''); ?>" id="tab-12">
        <div class="p-a-sm">
            <h5>Website Maintenance</h5>
        </div>
        <div class="p-a-sm col-md-12">
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <label>Put site under maintenance?</label><br>
                    <label>
                        <input type="radio" name="maintenance" value="yes"
                            <?php echo e(isset($WebmasterSetting->site_maintenance) && $WebmasterSetting->site_maintenance == 1 ? 'checked' : ''); ?>>
                        Yes
                    </label>
                    <label class="ms-3" style="margin-left: 15px;">
                        <input type="radio" name="maintenance" value="no"
                            <?php echo e(isset($WebmasterSetting->site_maintenance) && $WebmasterSetting->site_maintenance == 0 ? 'checked' : ''); ?>>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>
    <?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/webmaster/settings/maintenance.blade.php ENDPATH**/ ?>