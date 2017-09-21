
SELECT * FROM wp_posts pos WHERE pos.guid in

                                 (Select p.guid  from wp_posts p join

                                   (SELECT Concat(',',meta_value,',')  value
                                    FROM wp_postmeta
                                    WHERE meta_key='_product_image_gallery'
                                          or meta_key='_thumbnail_id'

                                   ) z

                                     on value like CONCAT('%,',p.ID,',%')
                                 )
                                 AND pos.guid not like '%/uploads/2017/09%'

# SELECT * FROM wp_posts
                # WHERE ID in
                        #
#                                  (Select p.ID  from wp_posts p join
#
#                                    (SELECT Concat(',',meta_value,',')  value
#                                     FROM wp_postmeta
#                                     WHERE meta_key='_product_image_gallery'
#                                           or meta_key='_thumbnail_id'
#
#                                    ) z
#
#                                      on value like CONCAT('%,',p.ID,',%')
#                                  )
#                                  AND guid not like '%/uploads/2017/09%'


# DELETE FROM wp_postmeta
# #WHERE post_id #not in (SELECT ID FROM wp_posts)
# WHERE #(meta_key='_product_image_gallery'
#       #or meta_key='_thumbnail_id')
#       #AND
#   post_id = 5957

#DELETE FROM wp_posts where post_type = 'attachment' and guid not like '%/uploads/2017/09%'
DELETE from wp_posts where
  post_parent not in (6422,
                      6420,
                      6391,
                      6387)
  and post_type = 'attachment'
  and (post_mime_type = 'image/jpeg'
       or  post_mime_type = 'image/png')
;



