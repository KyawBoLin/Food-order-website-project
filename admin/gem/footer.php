 <!-- footer  -->
    <div class="footer">
            <p class="msg smFont">Pracitce for job and developed by <a href="#" class="dev">Kyaw Bo Lin</a> .</p>
    </div>
    <!-- footer  -->

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/bootstrap.min.js"></script>
     <!-- Javascript codes  -->

    <script>
        $(document).ready(function(){
            $('#selectAllBoxes').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked=true;
                    })
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked=false;
                    })
                }
            })
        })

        $(document).ready(function(){
            $('#selectAllBoxes2').click(function(){
                if(this.checked){
                    $('.checkBoxes2').each(function(){
                        this.checked=true;
                    })
                }else{
                    $('.checkBoxes2').each(function(){
                        this.checked=false;
                    })
                }
            })
        })

        CKEDITOR.replace('editor');
    
    </script>

</body>
</html>