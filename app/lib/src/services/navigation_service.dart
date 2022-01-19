import 'package:flutter/widgets.dart';

class NavigationService with ChangeNotifier {
  int _currentPage = 0;
  final PageController _pageController = PageController(initialPage: 0);

  int get currentPage => _currentPage;

  void incrementPage(int last) {
    if (_currentPage == last) {
      return;
    }
    _currentPage++;
    _pageController.animateToPage(
      _currentPage,
      duration: const Duration(milliseconds: 250),
      curve: Curves.easeOut,
    );
    notifyListeners();
  }

  void decrementPage(int first) {
    if (_currentPage == first) {
      return;
    }
    _currentPage--;
    _pageController.animateToPage(
      _currentPage,
      duration: const Duration(milliseconds: 250),
      curve: Curves.easeOut,
    );
    notifyListeners();
  }

  PageController get pageController => _pageController;
}
