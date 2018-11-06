<div class="SidebarContainer-sidebarContainer-1e3j0">
    <button id="id-3026" aria-haspopup="true" data-qa-id="serverMenuButton" role="button"
            class="SidebarMenuButton-sidebarMenuButton-Nm3SG  Link-link-2XYrU Link-default-32xSO  Link-isSelected-3GpAs    "
            type="button">
        <div class="SidebarMenuButton-sidebarMenuButtonContainer-3vW-e">
									<span class="SidebarMenuButton-sidebarMenuTitle-2rcM8">
										<span class="SidebarMenuButton-sidebarMenuPrimaryTitleContainer-15y7y">
											<span class="SidebarMenuButton-sidebarMenuPrimaryTitle-3-46F"><?php echo isset($MenuServer) ? $MenuServer->name : null; ?></span>
											<div class="DisclosureArrow-disclosureArrow-1sBFv DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd DisclosureArrow-isSelected-VMAVr"></div>
										</span>
										<span class="SidebarMenuButton-sidebarMenuSecondaryTitle-1oZlq"></span>
									</span>
            <i class="plex-icon-lock-560 ServerMenuButton-icon-2yrbL ServerMenuIcon-secureIcon-Xrgxg"
               aria-hidden="false" aria-label="Secure"></i>
        </div>
    </button>
    <div class="SidebarScroller-scroller-1qhOG Scroller-scroller-d5-b- Scroller-vertical-1bgGS Scroller-auto-3t4gM">
        <div class="ServerSidebar-sidebarContent-3hRNR">
            <div>
                <div role="navigation" data-qa-id="sidebarLibrariesList">
                    <div class="SidebarServerLibraries-librariesListHeader-33wsS SidebarList-sidebarListHeader-m1Kth"
                         role="header">
                        <div class="SidebarServerLibraries-librariesTitle-3iqmv">Links</div>
                    </div>
                    <div class="SidebarLibraryItem-libraryListItem-2cmmj SidebarListItem-sidebarListItem-3ijGg">
                        <a data-qa-id="sidebarLibraryItem--11"
                           href="/movie/list"
                           role="link"
                           class="SidebarLink-sidebarLink-3tOhK Link-default-32xSO Link-link-2XYrU Link-default-32xSO">
                            <div class="SidebarLink-container-1wDcq">
                                <div class="SidebarLink-icon-3AlP8">
                                    <i class="plex-icon-movies-560"
                                       aria-hidden="true"></i></div>
                                <div class="SidebarLink-title-7WfGt">All movies</div>
                            </div>
                        </a>
                    </div>
                    <div class="SidebarServerLibraries-librariesListHeader-33wsS SidebarList-sidebarListHeader-m1Kth"
                         role="header">
                        <div class="SidebarServerLibraries-librariesTitle-3iqmv">Libraries</div>
                    </div>
                    <?php if (isset($MenuLibraries)) : ?>
                        <?php foreach ($MenuLibraries as $library) : ?>
                            <div class="SidebarLibraryItem-libraryListItem-2cmmj SidebarListItem-sidebarListItem-3ijGg">
                                <a data-qa-id="sidebarLibraryItem--11"
                                   href="/library/<?php echo $library->id; ?>"
                                   role="link"
                                   class="SidebarLink-sidebarLink-3tOhK Link-default-32xSO Link-link-2XYrU Link-default-32xSO">
                                    <div class="SidebarLink-container-1wDcq">
                                        <div class="SidebarLink-icon-3AlP8">
                                            <i class="plex-icon-<?php echo $library->type === 'movie' ? 'movies' : 'shows'; ?>-560"
                                               aria-hidden="true"></i></div>
                                        <div class="SidebarLink-title-7WfGt"><?php echo $library->name; ?></div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>