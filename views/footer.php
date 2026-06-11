    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>GameVault</h3>
                    <p>Your ultimate gaming platform. Discover, review, and conquer the gaming world.</p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                        <li><a href="<?php echo SITE_URL; ?>?route=/games">Games</a></li>
                        <?php if (isLoggedIn()): ?>
                            <li><a href="<?php echo SITE_URL; ?>?route=/logout">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo SITE_URL; ?>/?route=login">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <p>Email: info@gamevault.com</p>
                    <p>Follow us on social media</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 GameVault. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <button class="scroll-top" id="scrollTop">↑</button>

    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
