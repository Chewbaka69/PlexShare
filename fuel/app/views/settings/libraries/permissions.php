<div class="settings-container">
    <div class="filter-bar"></div>
    <div class="devices-container row">
        <div class="device-list-container col-sm-12 col-md-12">
            <div class="PrePlayList-container-WZ86O HubCell-hubCell-3Ys17">
                <div class="PrePlayDescendantList-descendantHubCellHeader-2qK3U HubCellHeader-hubCellHeader-2pvYN">
                    <div class="HubCellTitle-hubCellTitle-2abIn">SAISONS</div>
                </div>
                <div class="PrePlayListTopDivider-topDivider-3c8uz PrePlayDivider-divider-1qvbj"></div>
                <div>
                    <div class="" style="height: <?php echo count($permissions) * 40; ?>px;">
                        <?php foreach ($permissions as $permission) : ?>
                        <div class="MetadataTableRow-item-11DH-" style="position: relative; height: 40px;">
                            <div class="MetadataTableRow-overlay-1RiId">
                                <div class="MetadataTableCell-tableCell-35117" style="flex: 1 1 350px;">
                                    <span class="MetadataTableCell-title-3KMG0">
                                        <div class="MetadataTableTitle-titleContainer-3sPQC">
                                            <span class="MetadataTableTitle-title-2WmEM"><?php echo $permission->name; ?></span>
                                            <span></span>
                                        </div>
                                    </span>
                                </div>
                                <div class="MetadataTableCell-tableCell-35117" style="flex: 0 1 150px;">
                                    <span class="MetadataTableCell-title-3KMG0">13 épisodes</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="PrePlayListBottomDivider-bottomDivider-3XSnc PrePlayDivider-divider-1qvbj"></div>
            </div>
        </div>
    </div>
</div>